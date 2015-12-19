import scrapy
import json
import sys
from pprint import pprint
from scrapy.spider import BaseSpider
from scrapy.http import Request
from scrapy.selector import HtmlXPathSelector
from tutorial.items import DmozItem
from scrapy.spider import Spider
from scrapy.selector import Selector

class DmozSpider(scrapy.Spider):
	name = "dmoz"
	allowed_domains = ["www.google.com"]
	##start_urls = ["https://www.imdb.com/find?q=Aag+Aur+Daag+1970+"]
	start_urls = [l.strip() for l in open('c:/wamp/www/app/movielist_final.txt').readlines()]
		
	def parse(self, response):
		items = []
		sel = Selector(response)
		item = DmozItem()
		item['url']=response.url
		link = sel.xpath('//td[2]/a/@href').extract()[0]
		check=''.join(link)
		check='https://www.imbd.com'+check
		item['link']=check
		#request = scrapy.Request(check, callback=self.get_DT)
		#request.meta['item'] = item
		#yield request
		items.append(item)
		##if self.task_urls:
			##r = Request(url=self.task_urls[0], callback=self.parse)
			##items.append(r)
		return items
	
	def get_DT(self, response):
		item = response.meta['item']
		sel2 = Selector(response)
		item['rating'] = sel2.xpath('//*[@id="ratingWidget"]/span/span/text()').extract()[0]
		yield item
	
	

			
			
