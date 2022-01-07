import scrapy

def extract(selector, convert=False):
    string = selector.xpath('text()').get()
    return convertInt(string) if convert else string

def convertInt(s):
    return s.replace(' ', '').replace(',', '.')

class ResultSpider(scrapy.Spider):
    name = 'results2021'
    start_urls = ['https://elections.interieur.gouv.fr/departementales-2021/index.html']

    def parse(self, response):
        for anchor in response.css('.Style6'):
            url = anchor.xpath('@href').get()
            yield response.follow(url, callback=self.parseDpt, meta={'Département': extract(anchor)})

    def parseDpt(self, response):
        dpt = response.meta.get('Département')
        pars = response.css('p[align="left"]')

        for anchor in pars[0].css('a') + (pars[2].css('a') if len(pars)>2 else []):
            url = anchor.xpath('@href').get()
            text = extract(anchor)
            meta = {
                'Département': dpt,
                'Libellé': text[:text.index('(')-1],
                'CodeCan': text[text.index('(')+3:text.index(')')],
            }
            yield response.follow(url, callback=self.parseCan, meta=meta)

    def parseCan(self, response):
        dpt = response.meta.get('Département')
        libelle = response.meta.get('Libellé')
        codecan = response.meta.get('CodeCan')

        stats = dict()
        tables = response.css('table.table')

        duel = []
        tableNuances = tables[0]
        tableStats = tables[1]

        if len(tables)>2:
            for row in tables[0].css('tbody > tr'):
                cells = row.css('td')
                duel.append(extract(cells[1]))
            tableNuances = tables[1]
            tableStats = tables[2]

        for row in tableStats.css('tbody > tr'):
            cells = row.css('td')
            stats[extract(cells[0])] = extract(cells[1], convert=True)

        for row in tableNuances.css('tbody > tr'):
            cells = row.css('td')
            yield {
                'Département': dpt,
                'Code du Canton': codecan,
                'Libellé du Canton': libelle,
                **stats,
                'Binôme': extract(cells[0]),
                'Nuance': extract(cells[1]),
                'Voix': extract(cells[2], convert=True),
                'Duel': ':'.join(duel),
            }


