package com.example.waistand;

import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;
import androidx.fragment.app.FragmentPagerAdapter;

import java.util.ArrayList;

public class ViewPagerAdapter extends FragmentPagerAdapter {
    private ArrayList<Fragment> items;
    private ArrayList<String> itext = new ArrayList<>();

//    public ViewPagerAdapter(FragmentManager fm) {
    public ViewPagerAdapter(FragmentManager fm) {
        super(fm);
        items = new ArrayList<>();
        items.add(new FragmentWeeklyInCalendarData());
        items.add(new FragmentMonthlyInCalendarData());

//        itext.add("주간 자세 추이");
//        itext.add("월간 자세 추이");
    }

    @Override
    public Fragment getItem(int position) {
        return items.get(position);
    }

    @Override
    public int getCount() {
        return items.size();
    }

    @Nullable
    @Override
    public CharSequence getPageTitle(int position) {
        return super.getPageTitle(position);
    }
}
