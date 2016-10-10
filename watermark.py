import os, sys
watermark = os.path.join(os.getcwd(),"public/img/watermark.png")
src = "public/photobig_no_watermark"
big = "public/photobig"
bigsrc = os.path.join(os.getcwd(),src)
bigbase = os.path.join(os.getcwd(),big)
for bigpath, dirs, files in os.walk(bigsrc):
    if len(files) > 0:
        newpath = bigpath.replace(src, big)
        curdir = bigpath.split('/')
        if not os.path.exists(newpath): os.makedirs(newpath)
        for f in files:
            fsrc = os.path.join(bigpath, f)
            fnew = os.path.join(newpath, f)
            if not os.path.exists(fnew):
                if 'materiali' in curdir or 'komplektuyshie' in curdir: os.system('cp "{0}" "{1}"'.format(fsrc, fnew))
                else: os.system('composite -gravity center "{0}" "{1}" "{2}"'.format(watermark, fsrc, fnew))