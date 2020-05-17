package com.heyletscode.ihavetofly;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Paint;
import android.graphics.Rect;
import android.media.AudioAttributes;
import android.media.AudioManager;
import android.media.SoundPool;
import android.os.Build;
import android.os.Handler;
import android.view.MotionEvent;
import android.view.SurfaceView;

import java.util.ArrayList;
import java.util.List;
import java.util.Random;

public class GameView extends SurfaceView implements Runnable {

    private Thread thread;
    private boolean isPlaying, isGameOver = false;
    private int screenX, screenY, score = 0;
    public static float screenRatioX, screenRatioY;
    private Paint paint;
    private Bird[] birds;
    private SharedPreferences prefs;
    private Random random;
    private SoundPool soundPool;
    private int sound;
    private Flight flight;
    private GameActivity activity;
    private Background background1, background2;

    public GameView(GameActivity activity, int screenX, int screenY) {
        super(activity);

        this.activity = activity;

        prefs = activity.getSharedPreferences("game", Context.MODE_PRIVATE);


        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.M) {

            AudioAttributes audioAttributes = new AudioAttributes.Builder()
                    .setContentType(AudioAttributes.CONTENT_TYPE_MUSIC)
                    .setUsage(AudioAttributes.USAGE_GAME)
                    .build();

            soundPool = new SoundPool.Builder()
                    .setAudioAttributes(audioAttributes)
                    .build();

        } else
            soundPool = new SoundPool(1, AudioManager.STREAM_MUSIC, 0);

        sound = soundPool.load(activity, R.raw.shoot, 1);

        this.screenX = screenX;                 // this.  이게 먼지 잘 몰겠다..
        this.screenY = screenY;
        screenRatioY = 1920f / screenY;
        screenRatioX = 1080f / screenX;

        background1 = new Background(screenX, screenY, getResources());
        background2 = new Background(screenX, screenY, getResources());

        flight = new Flight(this, screenY, screenX, getResources());

//        background2.y = -screenY;     // 배경 세로로 움직이게 할때 바꿔주면 됨
        background2.x = screenX;

        paint = new Paint();
        paint.setTextSize(128);
        paint.setColor(Color.WHITE);

        birds = new Bird[4];

        for (int i = 0;i < 4;i++) {

            Bird bird = new Bird(getResources());   // 새 새로 생성
            birds[i] = bird;

        }

        random = new Random();

    }

    @Override
    public void run() {

        while (isPlaying) {

            update ();
            draw ();
            sleep ();

        }

    }

    private void update () {

//        background1.y -= 10 * screenRatioY;
//        background2.y -= 10 * screenRatioY;
//
//        if (background1.y + background1.background.getHeight() < 0) {
//            background1.y = screenY;
//        }
//
//        if (background2.y + background2.background.getHeight() < 0) {
//            background2.y = screenY;
//        }             // 배경 세로로 움직이게 하는거. 이걸로 하면 배경1이랑 2속도가 달라서 일단 주석처리해둠.

        background1.x -= 10 * screenRatioX;
        background2.x -= 10 * screenRatioX;

        if (background1.x + background1.background.getWidth() < 0) {
            background1.x = screenX;
        }

        if (background2.x + background2.background.getWidth() < 0) {
            background2.x = screenX;
        }                                     // 배경 움직임 (가로)



        if (flight.go_left) {
            flight.x -= 20 * screenRatioX;  // 왼쪽터치 시 왼쪽으로 이동
        }
        else if (flight.go_right){
            flight.x += 20 * screenRatioX;  // 오른쪽터치 시 오른쪽으로 이동
        }
        else
            flight.x += 0;



        if (flight.y < 0)
            flight.y = 0;         // 비행기가 화면 위로 안넘어가게 하는거 (삭제 하면 됨)

        if (flight.y >= screenY - flight.height)
            flight.y = screenY - flight.height;      // 비행기가 화면 아래로 안넘어가게 하는거

        if (flight.x >= screenX - flight.width)
            flight.x = screenX - flight.width;      // 비행기가 오른화면 넘어로 안넘어가게 하는거

        if (flight.x < 0)
            flight.x = 0;                           // 비행기가 왼쪽화면 넘어로 안넘어가게 하는거



        for (Bird bird : birds) {
            if (bird.y >= screenY - bird.height) {  // 장해물이 밑에 닿았을 때
                if(!Rect.intersects(bird.getCollisionShape(), flight.getCollisionShape())) {
                    // 장해물과 비행기가 닿지 않았으면
                    score++;         // 장해물이 밑으로 넘어갔을때 점수 +
                    bird.y = 0;
                    return;
                }
            }
        }

        for (Bird bird : birds) {

            bird.y += bird.speed;      // 새가 아래로 움직이게 하는거

//            if (bird.x + bird.width < 0) {
            if (bird.y >= screenY - bird.height) {  // 새가 밑에 닿았을 때

                int bound = (int) (30 * screenRatioY);
                bird.speed = random.nextInt(bound);          // 새 내려오는 속도 조절

                if (bird.speed < 10 * screenRatioY)
                    bird.speed = (int) (10 * screenRatioY);

                bird.y = screenY;
                bird.x = random.nextInt(screenX - bird.width);   // 새 복제 좌표인듯?

                bird.wasShot = false;
            }

            if (Rect.intersects(bird.getCollisionShape(), flight.getCollisionShape())) {
                // 새랑 비행기랑 부딫히면 게임오버
                isGameOver = true;
                return;
            }

        }

    }

    private void draw () {

        if (getHolder().getSurface().isValid()) {

            Canvas canvas = getHolder().lockCanvas();
            canvas.drawBitmap(background1.background, background1.x, background1.y, paint);
            canvas.drawBitmap(background2.background, background2.x, background2.y, paint);

            for (Bird bird : birds)
                canvas.drawBitmap(bird.mercury, bird.x, bird.y, paint);   // 행성 장애물 그려냄
//                canvas.drawBitmap(bird.getBird(), bird.x, bird.y, paint);  // 기존 새 그려냄

            canvas.drawText(score + "", screenX / 2f, 164, paint);

            if (isGameOver) {
                isPlaying = false;
//                canvas.drawBitmap(flight.getDead(), flight.x, flight.y, paint);
                getHolder().unlockCanvasAndPost(canvas);
                saveIfHighScore();
                waitBeforeExiting ();
                return;
            }

 //           canvas.drawBitmap(flight.getFlight(), flight.x, flight.y, paint);  // 기존 비행기 그려냄
            canvas.drawBitmap(flight.spaceship, flight.x, flight.y, paint);   // 우주선 그려냄


            getHolder().unlockCanvasAndPost(canvas);

        }

    }

    private void waitBeforeExiting() {

        try {
            Thread.sleep(1000);
            activity.startActivity(new Intent(activity, MainActivity.class));
            activity.finish();
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

    }

    private void saveIfHighScore() {

        if (prefs.getInt("highscore", 0) < score) {
            SharedPreferences.Editor editor = prefs.edit();
            editor.putInt("highscore", score);
            editor.apply();
        }

    }

    private void sleep () {
        try {
            Thread.sleep(17);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }

    public void resume () {

        isPlaying = true;
        thread = new Thread(this);
        thread.start();

    }

    public void pause () {

        try {
            isPlaying = false;
            thread.join();
        } catch (InterruptedException e) {
            e.printStackTrace();
        }

    }

    @Override
    public boolean onTouchEvent(MotionEvent event) {


        switch (event.getAction()) {
                case MotionEvent.ACTION_DOWN:
                    //        flight.go_right = false;
                    if (event.getX() < screenX / 2) {
                        flight.go_right = false;
                        flight.go_left = true;              // 왼쪽 터치하면 왼쪽으로 이동

                    }

                    if (event.getX() > screenX / 2) {
                        flight.go_left = false;
                        flight.go_right = true;             // 오른쪽 터치하면 오른쪽으로 이동
                    }
//                        flight.go_left = false;
//                        flight.go_right = false;

//                    Handler mHandler = new Handler();
//                    mHandler.postDelayed(new Runnable()  {
//                        public void run() {
//                            flight.go_left = false;// 시간 지난 후 실행할 코딩
//                        }
//                    }, 200); // 0.5초후

                    break;
        }
        return true;
    }

}
