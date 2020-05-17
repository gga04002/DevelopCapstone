package com.heyletscode.ihavetofly;

import android.content.res.Resources;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.graphics.Rect;

import static com.heyletscode.ihavetofly.GameView.screenRatioX;
import static com.heyletscode.ihavetofly.GameView.screenRatioY;

public class Flight {

    int toShoot = 0;
    boolean isGoingUp = false;
    boolean go_left = false;
    boolean go_right = false;

    int x, y, width, height, wingCounter = 0, shootCounter = 1;
    Bitmap dead, spaceship;
    private GameView gameView;

    Flight (GameView gameView, int screenY, int screenX, Resources res) {

        this.gameView = gameView;

        spaceship = BitmapFactory.decodeResource(res, R.drawable.spaceship);

        width = spaceship.getWidth();
        height = spaceship.getHeight();

        width /= 16;
        height /= 16;

        width = (int) (width * screenRatioX);
        height = (int) (height * screenRatioY);

        spaceship = Bitmap.createScaledBitmap(spaceship, width, height, false);



        y = screenY / 1;
//        x = (int) (64 * screenRatioX);
        x = screenX / 2;

    }


    Rect getCollisionShape () {
        return new Rect(x, y, x + width, y + height);
    }

//    Bitmap getDead () {
//        return dead;
//    }

}
