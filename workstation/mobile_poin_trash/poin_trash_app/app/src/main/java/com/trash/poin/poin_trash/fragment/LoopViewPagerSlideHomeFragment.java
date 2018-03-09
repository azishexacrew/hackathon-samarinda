package com.trash.poin.poin_trash.fragment;

import android.os.Bundle;
import android.os.Handler;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.trash.poin.poin_trash.R;
import com.trash.poin.poin_trash.fragment.SliderDashboard.CycleIndicatorSlideImageHome;
import com.trash.poin.poin_trash.fragment.SliderDashboard.LoopViewPagerHome;
import com.trash.poin.poin_trash.fragment.SliderDashboard.SlideHomeAdapter;


public class LoopViewPagerSlideHomeFragment extends Fragment {

    private LoopViewPagerHome viewpager;
    Handler handler;
    Runnable update;

    public LoopViewPagerHome getViewpager() {
        return viewpager;
    }

    @Nullable
    @Override
    public View onCreateView(LayoutInflater inflater, @Nullable ViewGroup container,
                             @Nullable Bundle savedInstanceState) {
        return inflater.inflate(R.layout.home_fragment_sample_loop_viewpager, container, false);




    }

    @Override
    public void onViewCreated(View view, @Nullable Bundle savedInstanceState) {
        viewpager = (LoopViewPagerHome) view.findViewById(R.id.viewpager);
        CycleIndicatorSlideImageHome indicator = (CycleIndicatorSlideImageHome) view.findViewById(R.id.indicator);
        viewpager.setAdapter(new SlideHomeAdapter(this.getContext()));
        indicator.setViewPager(viewpager);

        handler = new Handler();

        update = new Runnable() {
            public void run() {
                int currentPage=viewpager.getCurrentItem();
                if (currentPage == 4) {
                    currentPage = -1;
                }
                viewpager.setCurrentItem(currentPage+1, true);

                handler.postDelayed(update,4000);
            }
        };

        update.run();
        /*new Timer().schedule(new TimerTask() {

            @Override
            public void run() {
                handler.post(update);
            }
        }, 3000);*/
    }
}
