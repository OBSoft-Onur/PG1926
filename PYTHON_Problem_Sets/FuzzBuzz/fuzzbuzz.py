sayi = 0

while sayi<100:
    if sayi%3 == 0 and sayi%5 ==0:
        print("FuzzBuzz")
    elif sayi%3 == 0:
        print("Fuzz")
    elif sayi%5 == 0:
        print("Buzz")
    else:
        print(sayi)
    sayi+=1