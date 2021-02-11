import school


okul_sayisi = int(input("Kaç adet okul kaydedeceksin? : "))
dic = {}
for i in range(0,okul_sayisi):
	okul = input("{}. Okul ismini gir : ".format((i+1)))
	okul_year = input("Okul kaç yılında kuruldu : ")
	okul_fac_count = input("Fakülte sayısını gir : ")
	okul_dep_count = input("Kaç tane bölüm var : ")
	okul_lect_count = input("Kaç tane akademisyen çalışıyor : ")
	dic[str(i)] = [okul,okul_year,okul_fac_count,okul_dep_count,okul_lect_count]
school_name = school.School(dic)
school.School.saveSchool(school_name)
