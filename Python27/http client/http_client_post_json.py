__author__ = "Rewat Boonsit"

import httplib
import urllib
import json

connection = httplib.HTTPConnection("http://www.kteclaimsurvay.com:5792")
headers = {'Content-Type': 'application/json'}

params = urllib.urlencode({'spam': 1, 'eggs': 2, 'bacon': 0})

connection.request('POST','/login/list_claim_api',params,headers)

response = connection.getresponse()
print(response.read().decode())
