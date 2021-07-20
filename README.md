# CodeIgniter4 Ajax CRUD

Program sederhana Ajax Crud dengan CodeIgniter4. 

# Installation
### Clone the repository:
```
git clone https://github.com/yeremiaraulandreas/iuran_kas.git
```

### Pindah ke directory iuran_kas:
```
cd iuran_kas
```

### Install dependency composer dengan git bash atau terminal:
```
composer install
```

### Buat database baru. Kemudian rename .env.example ke .env selanjutnya sesuaikan dengan konfigurasi database:
```
database.default.hostname = localhost
database.default.database = crud-ci4
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
```

### Migrasi database:
```
php spark migrate
```

### Buat data dummy dengan perintah:
```
php spark db:seed BookSeeder
```

### Jalankan aplikasi dengan perintah:
```
php spark serve
``` 

Sekarang buka browser dengan alamat address http://localhost:8080/

# Screenshoot | Demo on [Heroku](https://crud-codeigniter4.herokuapp.com)
|   |   |
| ------------- | ------------- |
| Dashboard  |  Warga |
| ![Dashboard](![image](https://user-images.githubusercontent.com/81977332/126323975-6c9ea99b-b061-408d-bbfc-e3eec3874d09.png)
)| ![Warga](![image](https://user-images.githubusercontent.com/81977332/126324070-381ecd38-36fe-4bc8-b25d-692ad6798d3f.png))|
| Update  |  Delete |
| ![Image of Index](![image](https://user-images.githubusercontent.com/81977332/126324153-2592c5fc-047d-4659-a233-0f4d23fb6aa7.png))| ![Image of Index](![image](https://user-images.githubusercontent.com/81977332/126324275-88ecbef6-d2b3-43f3-9298-2872a2f88ff6.png)) |
