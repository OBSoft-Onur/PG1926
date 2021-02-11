# Kelime uzunluğunu ölçüyor
import re
def kontrol(str):
  count = 0
  for ch in str:
    if ch == '@':
      count = count + 1
 
  if count == 1:
    return True
  else:
    return False

def mailCtrl(email):
    m = re.search(r'(.+)@(.+)\.(.+)', email)
    if m:
        (list(m.groups()))
    mailCheck(m)

def mailCheck(m):
    if m[1].isalnum() and m[2].isalnum() and m[2].isalnum():
        return True
    else:
        return False

def main(email,m):
    email = input("Mail giriniz")
    if mailCheck(m) == True and mailCtrl(email) == True:
        
