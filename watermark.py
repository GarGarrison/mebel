import os, sys
watermark = os.path.join(os.getcwd(),"public/img/watermark.png")
bigbase = os.path.join(os.getcwd(),"public/photobig")
for bigpath, dirs, files in os.walk(bigbase):
    curdir = bigpath.split('/')[-1]
    if curdir not in ['materiali', 'komplektuyshie'] and len(files) > 0:
        for f in files:
            fbig = os.path.join(bigpath, f)
            os.system('composite -gravity center "{0}" "{1}" "{2}"'.format(watermark, fbig, fbig))
