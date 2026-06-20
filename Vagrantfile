# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/jammy64"
  config.vm.network "forwarded_port", guest: 80, host: 80, host_ip: "127.0.0.1"
  config.vm.network "forwarded_port", guest: 81, host: 81, host_ip: "127.0.0.1"
  config.vm.network "forwarded_port", guest: 82, host: 82, host_ip: "127.0.0.1"
end