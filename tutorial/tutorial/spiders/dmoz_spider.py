import scrapy
import json
import sys
from pprint import pprint

from tutorial.items import DmozItem

class DmozSpider(scrapy.Spider):
    name = "dmoz"
    allowed_domains = ["dmoz.org"]
    start_urls = [l.strip() for l in open('c:/wamp/www/app/movie_images.txt').readlines()]

    def parse(self, response):
        for sel in response.xpath('//*[@id="img_primary"]/div[1]/a'):
            item = DmozItem()
			item['link']="";
            item['link'] = sel.xpath('img/@src').extract()
            yield item
