import requests
import json
import sys
av = sys.argv[1]
headers = {
    "User-Agent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36",
    # 这段代码的意思是你从哪儿获得这个网址的(换一句话讲,谁推荐你去访问这个网址的).有了它就能够正常访问.
    "referer": "https://message.bilibili.com/"
}
def get_video_info(bv):
    """
    功能: 返回某个视频的信息
    参数: av(av号)bv(bv号),需要在二者中至少传入一个,否则函数返回0.BV号和AV号的返回值是一样的.
    返回: 视频信息,以字典形式返回
    """
    url = 'https://api.bilibili.com/x/web-interface/archive/stat?aid=' + \
        str(bv)
    response = requests.get(url, headers=headers)
    data = json.loads(response.text)
    if data['code']==0:
        return str(data['data']['bvid'])
    else:
        return str("ERROR, code:"+str(data['code']))

print(get_video_info(av))