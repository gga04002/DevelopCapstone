/*
* WrapContentViewPager : Toolbar 사용 시 ViewPager의 android:layout_height="wrap_content"가 적용되지 않는 점을 해결하기 위한 클래스
* == 뷰페이저의 height 조절 클래스
* 신경 꺼도 되는 클래스임
* */
package com.example.waistand;

import android.content.Context;
import android.util.AttributeSet;
import android.view.View;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.viewpager.widget.ViewPager;

public class WrapContentViewPager extends ViewPager {
    public WrapContentViewPager(@NonNull Context context) {
        super(context);
    }

    public WrapContentViewPager(@NonNull Context context, @Nullable AttributeSet attrs) {
        super(context, attrs);
    }

    @Override
    protected void onMeasure(int widthMeasureSpec, int heightMeasureSpec) {
        int mode = MeasureSpec.getMode(heightMeasureSpec);
        if(mode == MeasureSpec.UNSPECIFIED || mode == MeasureSpec.AT_MOST){
            super.onMeasure(widthMeasureSpec, heightMeasureSpec);
            int height = 0;
            for(int i = 0; i< getChildCount(); i++){
                View child = getChildAt(i);
                child.measure(widthMeasureSpec, MeasureSpec.makeMeasureSpec(0, MeasureSpec.UNSPECIFIED));
                int h = child.getMeasuredHeight();
                if(h > height)
                    height = h;
            }
            heightMeasureSpec = MeasureSpec.makeMeasureSpec(height, MeasureSpec.EXACTLY);
        }
        super.onMeasure(widthMeasureSpec, heightMeasureSpec);

    }
}
