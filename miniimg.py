import os, sys
small = "/photosmall"
big = "/photobig_no_watermark"
smallbase = os.path.join(os.getcwd(),"public"+small)
bigbase = os.path.join(os.getcwd(),"public"+big)
for bigpath, dirs, files in os.walk(bigbase):
    if len(files) > 0:
        smallpath = bigpath.replace(big, small)
        if not os.path.exists(smallpath): os.makedirs(smallpath)
        for f in files:
            fbig = os.path.join(bigpath, f)
            fsmall = os.path.join(smallpath, f)
            if not os.path.exists(fsmall):
                os.system('convert -scale 35% "{0}" "{1}"'.format(fbig, fsmall))
