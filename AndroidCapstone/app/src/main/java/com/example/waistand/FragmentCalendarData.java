package com.example.waistand;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;
import androidx.viewpager.widget.ViewPager;

import com.google.android.material.tabs.TabLayout;

import java.util.ArrayList;

public class FragmentCalendarData extends Fragment {
    ViewPager vp;
    TabLayout tab;

    ArrayList<Integer> images = new ArrayList<>();

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        ViewGroup rootView = (ViewGroup) inflater.inflate(R.layout.fragment_calendar_data, container, false);

        tab = rootView.findViewById(R.id.tab);
        vp = rootView.findViewById(R.id.viewPager);

        ViewPagerAdapter adapter = new ViewPagerAdapter(getChildFragmentManager());
        vp.setAdapter(adapter);

        tab.setupWithViewPager(vp);

        images.add(R.drawable.weekly);
        images.add(R.drawable.calendar);

        for(int i=0; i<2; i++)
            tab.getTabAt(i).setIcon(images.get(i));

        return rootView;
    }
}
