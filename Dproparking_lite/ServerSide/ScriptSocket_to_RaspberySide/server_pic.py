import sys
import os
import time
import socket

fp = open('g3.png','rb')
try:
    for line in fp:
        print line
finally:
    fp.close()
    
print(fp)
