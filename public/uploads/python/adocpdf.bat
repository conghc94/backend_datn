directory=$1
filename=$2
extension=$3
SERVICE='soffice'
if [ "`ps ax|grep -v grep|grep -c $SERVICE`" -lt 1 ]; then 
unset DISPLAY
/usr/bin/soffice -headless -accept="socket,host=127.0.0.1,port=8100;urp;" -nofirststartwizard & 
sleep 5s
fi
python /home/backend/python/DocumentConverter.py /home/website/$directory$filename$extension /home/website/$directory$filename.pdf