package com.trash.poin.poin_trash.fragment;
import android.support.v4.app.Fragment;
import android.view.View;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;

import com.trash.poin.poin_trash.R;


/**
 * Created by Eko on 10/3/2017.
 */

public class BaseFragmentBottomNavigation extends Fragment {
    View fragmentContainer;
    boolean _hasLoadedOnce=false;

    /**
     * Called when a fragment will be displayed
     */
    public void willBeDisplayed() {
        // Do what you want here, for example animate the content
        if (fragmentContainer != null) {
            Animation fadeIn = AnimationUtils.loadAnimation(getActivity(), R.anim.fade_in);
            fragmentContainer.startAnimation(fadeIn);
        }
    }

    /**
     * Called when a fragment will be hidden
     */
    public void willBeHidden() {
        if (fragmentContainer != null) {
            Animation fadeOut = AnimationUtils.loadAnimation(getActivity(), R.anim.fade_out);
            fragmentContainer.startAnimation(fadeOut);
        }
    }

    public void addContainer(View container) {
        this.fragmentContainer=container;
    }

    @Override
    public void setUserVisibleHint(boolean isVisibleToUser) {
        super.setUserVisibleHint(isVisibleToUser);

        if(isVisibleToUser & !_hasLoadedOnce){
            refreshFragment();
        }
    }

    public void refreshFragment(){

    }
}
