__author__ = "Rewat Boonsit"

import socket
TCP_IP = "127.0.0.1"
TCP_PORT = "8880"
BUFFER_SIZE = 1024
MESSAGE = "Hello, World"

s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.connect((TCP_IP, TCP_PORT)) # connect to ip and port
s.send(MESSAGE.encode('utf-8')) # send data by use unicode

data = s.recv(BUFFER_SIZE) # recieve data
s.close() # close connection

# display data on screen
print("received data: " data)
