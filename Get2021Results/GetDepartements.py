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
        for href in response.css('.Style6'):
            url = href.xpath('@href').get()
            yield response.follow(url, callback=self.parseDpt, meta={'Département': extract(href)})

    def parseDpt(self, response):
        dpt = response.meta.get('Département')
        tables = response.css('table.table')

        stats = dict()
        for row in tables[1].css('tbody > tr'):
            cells = row.css('td')
            stats[extract(cells[0])] = extract(cells[1], convert=True)

        for row in tables[0].css('tbody > tr'):
            cells = row.css('td')
            yield {
                'Département': dpt,
                **stats,
                'Binôme': extract(cells[0]),
                'Voix': extract(cells[1], convert=True),
                'NbSieges': extract(cells[3], convert=True),
            }


