
from flask import Flask,render_template,request,session, abort,send_file,send_from_directory,redirect,url_for,make_response
import io; 
import csv
import selenium
from selenium import webdriver
import time
import os
import re
import random
import pandas as pd
from selenium.webdriver.chrome.options import Options
import threading
from multiprocessing import Process
from threading import Thread
import mysql.connector
import datetime
from datetime import datetime
import requests



def mysqlfunction():
    mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="sample"
)

    return mydb

app = Flask(__name__)
app.secret_key = 'yuvaraj2412' 

@app.route('/',methods=["POST","GET"])
def home():
    
    icon="10d"
    print("icon :",icon)
    return render_template("index.php",icon=icon)

@app.route('/weatherapi',methods=["POST","GET"])
def weatherapi():
    import requests
    if request.method=="POST":
        city=request.form.get("city")
        url = "http://api.openweathermap.org/data/2.5/weather?q="+city+"&units=imperial&appid=539ffe760087bd81e4126aeb4abcc097"
        response = requests.request("GET", url)

        # print(response.text)
        data=response.json()
        try:
            name= data['name']
            print("Location :", name)
        except:
            name="NA"
            print("Location :", name)
        
        try:
            country=data['sys']['country']
            print("Country :" ,country)
        except:
            country="NA"
            print("Country :" ,country)
        # w=[]
        # weather=(data['weather'])
        # for i in weather:
        # # print(i)
        #     for key,values in i.items():
        #         w.append(values) 
        #         my_index = '1'           
        # print("weather :" ,w[int(my_index)])
        try:
            icon = data['weather'][0]['icon']
            print("icon :",icon)
        except:
            icon="11d"
            print("icon :",icon)

        try:
            weather = data['weather'][0]['main']
            print("weather :",weather)
        except:
            weather="NA"
            print("weather :",weather)
        try:
            longitute=data['coord']['lon']
            print("longitute :",longitute)
        except:
            longitute="NA"
            print("longitute :",longitute)
        try:
            latitude=data['coord']['lat']
            print("latitude :",latitude)
        except:
            latitude="NA"
            print("latitude :",latitude)
        try:
            wind_speed=data['wind']['speed']
            print("wind speed:",wind_speed)
        except:
            wind_speed="NA"
            print("wind speed:",wind_speed)

        try:
            d=data['main']['temp']
            # print("temperature :",temperature)

            Fahrenheit= d
            temperature = ((Fahrenheit-32)*5)/9
            temperature ="{:.2f}".format(temperature)

            print("temperature :" ,temperature) 
        except:
            temperature="Na"
            print("temperature :" ,temperature) 
        try:
            humidity=data['main']['humidity']
            print("humidity:",humidity)
        except:
            humidity="NA" 
            print("humidity:",humidity)

        return render_template("index.php",name=name,country=country,wind_speed=wind_speed,temperature=temperature,humidity=humidity,latitude=latitude,longitute=longitute,weather=weather,icon=icon)

if __name__ == '__main__':
   app.run(debug=True,port=8010)
