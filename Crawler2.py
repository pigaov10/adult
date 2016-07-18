# -*- coding: utf-8 -*-
import json

import re
from urllib import urlencode
import urllib
import urllib2
from urllib2 import HTTPCookieProcessor
from urllib2 import HTTPError
from urllib2 import ProxyHandler
from urllib2 import Request
from urllib2 import build_opener
from bs4 import BeautifulSoup
from datetime import datetime
import MySQLdb

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
conn  = MySQLdb.connect("localhost","root","29367253","tocadasnovinhas" )
for video in soup.find("ul",{"class":"videos"}):
    img = video.find("img")
    time = video.find("var")
    video = video.find("a")
    if type(img) is not int:
        alt = img['alt']
        thumb = img['data-mediumthumb']
        href = video['href']
        tempo = video.contents[0]
        x = conn.cursor()
        try:
            x.execute("""INSERT INTO video (name,description,img,embed,category,tempo) VALUES (%s,%s,%s,%s,%s,%s)""",(alt.lower().replace(" ","-"),alt,thumb,'','loiras',tempo))
            conn.commit()
        except:
            conn.rollback()
