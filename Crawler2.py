# -*- coding: utf-8 -*-
import json
import urllib2
from bs4 import BeautifulSoup
from datetime import datetime

default_header = {'User-Agent': 'Mozilla/5.0 (X11; Linux x86_64; rv:38.0) Gecko/20100101 Firefox/38.0',}

sites = [
     'http://www.pornhub.com/video/search?search=loira',
    # 'http://www.hellxx.com/index.php?module=videos&tag=d',
    # 'http://www.redtube.com/?search=s',
    # 'http://pt.xhamster.com/search.php?from=&new=&q=asasaa&qcat=video',
    # 'http://novinhasdozapzap.com/'
]

content = urllib2.urlopen(sites[0]).read()

soup = BeautifulSoup(content)

for video in soup.find("div",{"class":"phimage"}):
    print video.find("a")
    print "----------"
