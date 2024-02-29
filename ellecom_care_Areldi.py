###EDGEEEEEE
import fitbit
import gather_keys_oauth2 as Oauth2
import pandas as pd 
import datetime
import time
import csv
import mysql.connector

# You will need to put in your own CLIENT_ID and CLIENT_SECRET as the ones below are fake
CLIENT_ID=''
CLIENT_SECRET=''


wanted_time = str(input("Gunluk olarak veri cekilecek saat [(--:--) formatinda yaziniz]:"))

  

server=Oauth2.OAuth2Server(CLIENT_ID, CLIENT_SECRET)
server.browser_authorize()
ACCESS_TOKEN=str(server.fitbit.client.session.token['access_token'])
REFRESH_TOKEN=str(server.fitbit.client.session.token['refresh_token'])
auth2_client=fitbit.Fitbit(CLIENT_ID,CLIENT_SECRET,oauth2=True,access_token=ACCESS_TOKEN,refresh_token=REFRESH_TOKEN)


print("program basladi...")


def heart_data():
        yesterday = str((datetime.datetime.now() - datetime.timedelta(days=1)).strftime("%Y%m%d"))
        yesterday2 = str((datetime.datetime.now() - datetime.timedelta(days=1)).strftime("%Y-%m-%d"))

    
        fit_statsHR = auth2_client.intraday_time_series('activities/heart', base_date=yesterday2, detail_level='1min')
        ##shape(fit_statsHR)
        time_list = []
        val_list = []

        for i in fit_statsHR['activities-heart-intraday']['dataset']:
            val_list.append(i['value'])
            time_list.append(i['time'])
        heartdf = pd.DataFrame({'client_id':CLIENT_ID,'HeartRate':val_list,'Time':time_list,'Date':yesterday2})



        heartdf.to_csv('/Users/Areldi/Downloads/python-fitbit-master/Heart/heart'+ \
                yesterday+'.csv', \
                columns=['client_id','Time','HeartRate','Date'], header=True, \
                index = False)

        
        ##-----------------HEARTRATE DATABASE

        mydb =mysql.connector.connect(host='localhost',user='root',password='',database='ellecom_care')
        print("\n")
        print("Connected to heartrate database --> OK..")
        print("\n")

        cursor =mydb.cursor()
        csv_data =csv.reader(open(r'C:\Users\Areldi\Downloads\python-fitbit-master\Heart\heart'+ \
                yesterday+'.csv'))
        for row in csv_data:
            cursor.execute('INSERT INTO heartratedb (client_id,Time,HeartRate,Date) VALUES(%s,%s,%s,%s)',row)
            print(row)

        mydb.commit()
        cursor.close()
        print("\n")
        print("Writing to heartrate database --> DONE..!")





def sleep_data():
        today = str(datetime.datetime.now().strftime("%Y%m%d"))
        today2 = str(datetime.datetime.now().strftime("%Y-%m-%d"))
    

        """Sleep data on the night of ...."""
        fit_statsSl = auth2_client.sleep(date='today')
        stime_list = []
        sval_list = []
        for i in fit_statsSl['sleep'][0]['minuteData']:
            stime_list.append(i['dateTime'])
            sval_list.append(i['value'])
        sleepdf = pd.DataFrame({'client_id':CLIENT_ID,'State':sval_list,
                     'Time':stime_list,'Date':today2})
        sleepdf['Interpreted'] = sleepdf['State'].map({'2':'Awake','3':'Very Awake','1':'Asleep'})
        sleepdf.to_csv('/Users/Areldi/Downloads/python-fitbit-master/Sleep/sleep' + \
                        today+'.csv', \
                        columns = ['client_id','Time','State','Interpreted','Date'],header=True, 
                        index = False)




        ###############------SLEEP DATABASE

        mydb2 =mysql.connector.connect(host='localhost',user='root',password='',database='')
        print("\n")
        print("Connected to sleep database --> OK..")
        print("\n")

        cursor =mydb2.cursor()
        csv_data =csv.reader(open(r'C:\Users\Areldi\Downloads\python-fitbit-master\Sleep\sleep'+ \
                today+'.csv'))
        for row in csv_data:
            cursor.execute('INSERT INTO sleepdb (client_id,Time,State,Interpreted,Date) VALUES(%s,%s,%s,%s,%s)',row)
            print(row)

        mydb2.commit()
        cursor.close()
        print("\n")
        print("Writing to sleep database --> DONE..!")

           



def sleepsum_data():        
        today = str(datetime.datetime.now().strftime("%Y%m%d"))
        today2 = str(datetime.datetime.now().strftime("%Y-%m-%d"))

        """Sleep Summary on the night of ...."""
        fit_statsSum = auth2_client.sleep(date='today')['sleep'][0]
        ssummarydf = pd.DataFrame({'client_id':CLIENT_ID,'Date':fit_statsSum['dateOfSleep'],
                        'MainSleep':fit_statsSum['isMainSleep'],
                        'Efficiency':fit_statsSum['efficiency'],
                        'Duration':fit_statsSum['duration'],
                        'MinutesAsleep':fit_statsSum['minutesAsleep'],
                        'MinutesAwake':fit_statsSum['minutesAwake'],
                        'Awakenings':fit_statsSum['awakeCount'],
                        'RestlessCount':fit_statsSum['restlessCount'],
                        'RestlessDuration':fit_statsSum['restlessDuration'],
                        'TimeinBed':fit_statsSum['timeInBed']
                                } ,index=[0])
        ssummarydf.to_csv('/Users/Areldi/Downloads/python-fitbit-master/SleepSum/sleepsum' + \
                       today+'.csv', \
                       columns = ['client_id','Date',
                        'MainSleep',
                        'Efficiency',
                        'Duration',
                        'MinutesAsleep',
                        'MinutesAwake',
                        'Awakenings',
                        'RestlessCount',
                        'RestlessDuration',
                        'TimeinBed'],header=True, 
                        index = False)


        ###############----------SLEEP SUMMARY DATABASE

        mydb3 =mysql.connector.connect(host='localhost',user='root',password='',database='')
        print("\n")
        print("Connected to sleep summary database --> OK..")
        print("\n")

        cursor =mydb3.cursor()
        csv_data =csv.reader(open(r'C:\Users\Areldi\Downloads\python-fitbit-master\SleepSum\sleepsum'+ \
                today+'.csv'))
        for row in csv_data:
            cursor.execute('INSERT INTO sleepsumdb (client_id,Date,MainSleep,Efficiency,Duration,MinutesAsleep,MinutesAwake,Awakenings,RestlessCount,RestlessDuration,TimeinBed) VALUES(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)',row)
            print(row)

        mydb3.commit()
        cursor.close()
        print("\n")
        print("Writing to sleep summary database --> DONE..!")
        



while(True):

    print("program basa dondu...")
    an = datetime.datetime.now()
    hour = datetime.datetime.strftime(an, '%H')
    minute = datetime.datetime.strftime(an, '%M')
    print(hour)
    print(minute)
    h_m= hour+":"+minute

    if(h_m==wanted_time):
        try:
            heart_data()
        except:
            print("Kalp verisi alinamadi")

        try:
            sleep_data()
        except:
            print("Uyku verisi alinamadi")

        try:
            sleepsum_data()
        except:
            print("Uyku ozeti verisi alinamadi")


    else:
        print("saat dogru degil..")
    
    
    time.sleep(60)
   

    ###-----------------------------------------------


    
 

