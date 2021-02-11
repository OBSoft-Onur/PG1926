sayi = int(input())
array=[]
i = 1
while i<=10:
   array.append(sayi)
   sayi = int(input())
   i+=1
print(array)
print("Largest number is " , max(array))