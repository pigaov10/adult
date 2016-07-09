# -*- coding: utf-8 -*-
import json
from urllib import urlencode
import urllib
from urllib2 import HTTPCookieProcessor
from urllib2 import HTTPError
from urllib2 import ProxyHandler
from urllib2 import Request
from urllib2 import build_opener
from bs4 import BeautifulSoup
from datetime import datetime

default_header = {'User-Agent': 'Mozilla/5.0 (X11; Linux x86_64; rv:38.0) Gecko/20100101 Firefox/38.0',}

sites = [
    'http://www.xvideos.com/?k=novinhas',
    # 'http://www.pornhub.com/video/search?search=s',
    # 'http://www.hellxx.com/index.php?module=videos&tag=d',
    # 'http://www.redtube.com/?search=s',
    # 'http://pt.xhamster.com/search.php?from=&new=&q=asasaa&qcat=video',
    # 'http://novinhasdozapzap.com/'
]

default_headers = {'User-Agent': 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.9.2.9) Gecko/20100824 Firefox/3.6.9 ( .NET CLR 3.5.30729; .NET4.0E)',
                   'Accept-Language': 'pt-br;q=0.5',
                   'Accept-Charset': 'utf-8;q=0.7,*;q=0.7',
                   'Accept-Encoding': 'gzip',
                   'Connection': 'close',
                   'Cache-Control': 'no-cache',
                   'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
                   'Referer': None}

for site in sites:
    sock = urllib.urlopen(site)
    htmlSource = sock.read()
    soup = BeautifulSoup(htmlSource)
    divTag = soup.findAll("div",{"class": "thumb-block"})
    for tag in divTag:
        ancoras = tag.findAll("a")
        # thumb = tag.findAll("img")
        for ancora in ancoras:
            link = ancora.get('href')
            xvideos = sites[0].split('/')[2]
            siteDetalhes = ''.join([xvideos,link])
            sock = urllib.urlopen("http://"+siteDetalhes)
            htmlSource = sock.read()
            soup = BeautifulSoup(htmlSource)
            divDetalhes = soup.findAll("div",{"id": "tabEmbed"})
            for detalhes in divDetalhes:
                inputs = detalhes.find("input")
                print inputs.get('value')
