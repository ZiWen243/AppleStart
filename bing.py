import datetime
import requests
import re
import json
import time
import os
import traceback

def write_log(data,log_type="info"):
    type_list={"info":"INFO","warn":"WARNING","warning":"WARNING","err":"ERROR","error":"ERROR"}
    with open("/www/wwwroot/log/bing.log","a") as fp:
        type_str = type_list[log_type]
        time_str = time.strftime('%Y-%m-%d %H:%M:%S',time.localtime())
        data = data.replace("\n","   ")
        fp.write(time_str+" "+type_str+": "+data+"\n")
        

def move_img():
    names = os.listdir('/www/wwwroot/AppleStart/bing/')
    names.sort()
    os.system("\cp /www/wwwroot/AppleStart/bing/"+names[-1]+" /www/wwwroot/AppleStart/today_bing.bmp ")
    

def get_image():
    try:
        url = 'https://cn.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1'
        content = requests.get(url).content.decode("utf-8")
        json_c = json.loads(content)
        print(json_c)
        img_url = 'https://cn.bing.com' + json_c['images'][0]['url']
        print(img_url)
        image = requests.get(img_url).content
        file_name = '/www/wwwroot/AppleStart/bing/'+json_c['images'][0]['startdate']+'.jpg'
        f = open(file_name, 'wb')
        f.write(image)
        f.close()
        write_log(img_url+" "+file_name)
        return file_name
    except Exception as e:
        print("\033[1;31m ERROR! \033[0m")
        write_log(traceback.format_exc(),"err")
        return False

i=0
while True:
    if get_image()==False:
        i+=1
        continue
    else:
        move_img()
        print("success.")
        break
    if i>50:
        break