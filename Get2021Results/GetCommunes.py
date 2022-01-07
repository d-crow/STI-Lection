import scrapy

def extract(selector, extract='text()', convert=False):
    string = selector.xpath(extract).get()
    return convertInt(string) if convert else string

def convertInt(s):
    return s.replace(' ', '').replace(',', '.')

class ResultSpider(scrapy.Spider):
    name = 'results2021'
    start_urls = ['https://elections.interieur.gouv.fr/departementales-2021/index.html']

    def parse(self, response):
        for anchor in response.css('.Style6'):
            url = extract(anchor, '@href')
            yield response.follow(url, callback=self.parseDpt, meta={'Département': extract(anchor)})

    def parseDpt(self, response):
        dpt = response.meta.get('Département')
        pars = response.css('p[align="left"]')

        for anchor in pars[0].css('a') + (pars[2].css('a') if len(pars)>2 else []):
            url = extract(anchor, '@href')
            text = extract(anchor)
            meta = {
                'Département': dpt,
                'LibelléCan': text[:text.index('(')-1],
                'CodeCan': text[text.index('(')+3:text.index(')')],
            }
            yield response.follow(url, callback=self.parseCan, meta=meta)

    def parseCan(self, response):
        dpt = response.meta.get('Département')
        libellecan = response.meta.get('LibelléCan')
        codecan = response.meta.get('CodeCan')

        for option in response.css('option'):
            val = extract(option, '@value')
            if val!='#':
                meta = {
                    'Département': dpt,
                    'LibelléCan': libellecan,
                    'CodeCan': codecan,
                    'CodeCom': val[val.index('.html')-3:val.index('.html')],
                    'LibelléCom': extract(option),
                }
                yield response.follow(val, callback=self.parseCom, meta=meta)


    def parseCom(self, response):
        dpt = response.meta.get('Département')
        libellecan = response.meta.get('LibelléCan')
        codecan = response.meta.get('CodeCan')
        codecom = response.meta.get('CodeCom')
        libellecom = response.meta.get('LibelléCom')

        stats = dict()
        tables = response.css('table.table')

        for row in tables[1].css('tbody > tr'):
            cells = row.css('td')
            stats[extract(cells[0])] = extract(cells[1], convert=True)

        for row in tables[0].css('tbody > tr'):
            cells = row.css('td')
            yield {
                'Département': dpt,
                'Code du Canton': codecan,
                'Libellé du Canton': libellecan,
                'Code de la Commune': codecom,
                'Libellé de la Commune': libellecom,
                **stats,
                'Binôme': extract(cells[0]),
                'Nuance': extract(cells[1]),
                'Voix': extract(cells[2], convert=True),
            }


