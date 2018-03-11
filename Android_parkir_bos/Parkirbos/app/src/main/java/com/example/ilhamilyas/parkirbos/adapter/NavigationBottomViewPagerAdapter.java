package com.example.ilhamilyas.parkirbos.adapter;

import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentPagerAdapter;
import android.view.ViewGroup;


import com.example.ilhamilyas.parkirbos.fragment.Accountragment;
import com.example.ilhamilyas.parkirbos.fragment.ContainerFragment;
import com.example.ilhamilyas.parkirbos.fragment.HomeFragment;
import com.example.ilhamilyas.parkirbos.fragment.SettingFragment;
import com.example.ilhamilyas.parkirbos.fragment.TambahFragment;

import java.util.ArrayList;

/**
 *
 */
public class NavigationBottomViewPagerAdapter extends FragmentPagerAdapter {

	private ArrayList<Fragment> fragments = new ArrayList<>();
	private BaseFragmentBottomNavigation currentFragment;

	public NavigationBottomViewPagerAdapter(FragmentManager fm) {
		super(fm);
//
		fragments.clear();
		fragments.add(HomeFragment.newInstance(0));
		fragments.add(ContainerFragment.newInstance(1));
		fragments.add(Accountragment.newInstance(2));
		fragments.add(SettingFragment.newInstance(3));

	}

	@Override
	public Fragment getItem(int position) {
		return fragments.get(position);
	}

	@Override
	public int getCount() {
		return fragments.size();
	}

	@Override
	public void setPrimaryItem(ViewGroup container, int position, Object object) {
		if (getCurrentFragment() != object) {
			currentFragment = ((BaseFragmentBottomNavigation) object);
		}
		super.setPrimaryItem(container, position, object);
	}

	/**
	 * Get the current fragment
	 */
	public Fragment getCurrentFragment() {
		return this.currentFragment;
	}


}