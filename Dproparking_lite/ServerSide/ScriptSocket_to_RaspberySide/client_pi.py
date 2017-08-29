import time
import socket
import sys
 
TCP_IP = '192.168.2.115'
TCP_PORT = 5005
BUFFER_SIZE = 1024


s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.connect((TCP_IP, TCP_PORT))
while(1):
    
    MESSAGE = ":21100\r"
    print(MESSAGE)
    s.sendall(MESSAGE.encode('utf-8')) 
    time.sleep(.7)
    MESSAGE = ":20000\r"
    print(MESSAGE)
    s.sendall(MESSAGE.encode('utf-8')) 
    time.sleep(4)

    
s.close()
print ("received data:", data)
