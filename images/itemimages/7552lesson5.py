#This program for to convert celcius to farenhait
#f=(9/5)*c+32
#c=5/9(f-32)
#This prgroam is created by Mr.Krishna Bahadur Pun 19-12-2005
m=raw_input("Press C for Celsius to farenhait\
and Press F for farenhait to celcius ")
#program ma \ rakhyo bhene 1 line tala janchha tara \n rakhyo bhane output ma line break hunchha.
print m
m = m.lower()
if m=="c":
    c=int(raw_input("Enter the temperature in Celcius "))
    f=(9.0/5.0)*c+32.0
    #f=((180.0*c)/100.0)+32.0
    print "The temperature of",c,"degree is",f,"farenhait"
elif m=="f":
    fi=int(raw_input("Enter the temperature in Farenhait "))
    ci=(5.0/9.0)*fi-32.0
    print "The temperature of",fi,"farenhait is",ci,"degree"

raw_input(    )



