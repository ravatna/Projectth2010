__author__ = "Rewat Boonsit"


###########################

import socket
TCP_IP = "127.0.0.1"
TCP_PORT = "8880"
BUFFER_SIZE = 1024

s = socket(socket.AF_INET, socket.SOCK_STREAM)
s.bind((TCP_IP,TCP_PORT)) # bind to port
s.listen(1)

conn, addr = s.accept() # wait for client connect socket
print("Connection address: ", addr) #info from client

while 1 :
    data = conn.recv(BUFFER_SIZE)
    if not data: break
    print ("received data: ", data)
    conn.send(data) # put data to socket
conn.close() # close connection
