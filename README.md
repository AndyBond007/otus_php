- Установить vagrant
- Установить virtualbox
- Создать папку для проекта, и добавить в него Vagrantfile файл:
  
```txt
# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/jammy64"
  config.vm.network "forwarded_port", guest: 80, host: 80, host_ip: "127.0.0.1"
  config.vm.network "forwarded_port", guest: 81, host: 81, host_ip: "127.0.0.1"
  config.vm.network "forwarded_port", guest: 82, host: 82, host_ip: "127.0.0.1"
end
```

По умолчанию генерируется через

```txt
vagrant init ubuntu/jammy64
```

Запустить виртуальную машину

```txt
vagrant up
vagrant ssh
```

После входа в терминал виртуалки:
Устанавливаем Docker:

```
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
sudo apt-get update
sudo apt-get install -y docker-ce
```

Проверка

```
sudo systemctl status docker
```

Конфигурация GIT

```txt
git config --global user.name "Ваше имя"
git config --global user.email "ваш@email.com"
```

Генерация ключа

```txt
ssh-keygen -t ed25519 -C "ваша_почта@пример.com"
```

Соберем образ

```
sudo docker compose up
sudo docker compose build --no-cache
```
	





