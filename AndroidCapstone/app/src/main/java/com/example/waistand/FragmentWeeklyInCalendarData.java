/*
 * Fragment2 : 오늘 하루치 통계 페이지
 * */

package com.example.waistand;

import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

/**
 * A simple {@link Fragment} subclass.
 */
public class FragmentWeeklyInCalendarData extends Fragment {

    public FragmentWeeklyInCalendarData() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        ViewGroup rootView = (ViewGroup) inflater.inflate(R.layout.fragment_in_calendar_data_1, container, false);


        return rootView;
    }
}