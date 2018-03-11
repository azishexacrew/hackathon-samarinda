package com.trash.poin.poin_trash.adapter;

import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentPagerAdapter;

import android.view.ViewGroup;

import com.trash.poin.poin_trash.fragment.BaseFragmentBottomNavigation;
import com.trash.poin.poin_trash.fragment.ContainerFragment;
import com.trash.poin.poin_trash.fragment.DaftarBankSampahFragment;
import com.trash.poin.poin_trash.fragment.InformasiFragment;
import com.trash.poin.poin_trash.fragment.ProfilFragment;

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
		fragments.add(ContainerFragment.newInstance(0));
		fragments.add(DaftarBankSampahFragment.newInstance(1));
		fragments.add(ProfilFragment.newInstance(2));
		fragments.add(InformasiFragment.newInstance(3));
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