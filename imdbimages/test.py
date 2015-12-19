import json
import sys
from pprint import pprint
f = open("itemss.txt", "w")
with open('itemss.json') as data_file:    
		data = json.load(data_file)
print data[0]
i=0
s=""
while True:
	try:
		s=data[i]["link"]
		print s
		f.write(s+"\n")
		i=i+1
	except IndexError:
		break
#print(data)
print s  # will return 'blabla'
f.close()