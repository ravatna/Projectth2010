from googlefinance import getNews
import json
symbol = 'GOOG'
print(json.dumps(getNews( symbol), indent = 2))

