#!/usr/bin/env python

import time
import serial


print "**********************************"
print "License by d Profesional Parking"
print "mobile :0632451955"
print "**********************************"

ser = serial.Serial(
	port='/dev/ttyUSB0'
	,baudrate=9600
	,parity=serial.PARITY_NONE
	,stopbits=serial.STOPBITS_ONE
	,bytesize=serial.EIGHTBITS
	,timeout=1
)

counter = 0

pattern = '00000000' # pattern default
pattern_last = '00000000' # last time get pattern

mode = 'I' # 'I' is idle for IN , 'O' is idle for OUT 
ser.write(':21000\r')
time.sleep(.7)
while 1:	
	ser.write(':7\r') # check pattern input
	
	pattern = ser.readline() # get pattern to process
	

	if pattern == '00000000\r':
		print 'Ignore'
		
		#time.sleep(1)
		continue;


	if pattern != pattern_last :
		

		#file =open('pattern.txt','w')
		#file.write(pattern)
		#file.close()
		#file = open('pattern.txt','r')
		#x = file.readline()
		#file.close()

		 
		#print pattern
		#print '--------'

		pattern_last = pattern


		if mode == 'I' :
			

			if pattern == '01000000\r' :
				print 'Car move IN'
				mode = 'O'
				pattern = '00000000\r'
				ser.write(':20010\r')
				time.sleep(.7) # set to sleep seconds

		
		elif mode == 'O' :
			
			if pattern == '10000000\r' :

				print 'Car move OUT'
				mode = 'I'
				pattern = '00000000\r'
				ser.write(':21000\r')	
				time.sleep(.7) # set to sleep seconds
	

	time.sleep(.1) # set to sleep seconds
	
