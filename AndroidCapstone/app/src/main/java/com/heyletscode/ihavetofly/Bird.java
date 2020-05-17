package com.heyletscode.ihavetofly;

import android.content.res.Resources;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.graphics.Rect;

import static com.heyletscode.ihavetofly.GameView.screenRatioX;
import static com.heyletscode.ihavetofly.GameView.screenRatioY;

public class Bird {

    public int speed = 20;
    public boolean wasShot = true;
//    int x = 0, y, width, height, birdCounter = 1;
    int y = 0, x, width, height, birdCounter = 1;
    Bitmap mercury;

    Bird (Resources res) {

        mercury = BitmapFactory.decodeResource(res, R.drawable.mercury);

        width = mercury.getWidth();
        height = mercury.getHeight();

        width /= 20;
        height /= 20;

        width = (int) (width * screenRatioX);
        height = (int) (height * screenRatioY);

        mercury = Bitmap.createScaledBitmap(mercury, width, height, false);


        y = -height;
        x = width;
    }


    Rect getCollisionShape () {
        return new Rect(x, y, x + width, y + height);
    }

}
