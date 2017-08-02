package com.projectth.mobile.rabbitauto;

import android.content.Context;
import android.support.annotation.LayoutRes;
import android.support.annotation.NonNull;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.TextView;

/**
 * Created by Administrator on 3/25/2017.
 */

public class BookingItemAdapter extends ArrayAdapter<BookingItem> {
    Context ctx;
    BookingItem[] carItem;
    int m_res;

    public BookingItemAdapter(@NonNull Context context, @LayoutRes int resource, @NonNull BookingItem[] objects) {
        super(context, resource, objects);
        this.ctx = context;
        this.carItem = objects;
        this.m_res = resource;
    }

    @Override
    public int getCount() {
        return carItem.length;
    }

    @Override
    public BookingItem getItem(int position) {
        return carItem[position];
    }

    @Override
    public long getItemId(int position) {
        return 0;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {

        // 1
        final BookingItem item = carItem[position];

        // 2
        if (convertView == null) {
            final LayoutInflater layoutInflater = LayoutInflater.from(ctx);
            convertView = layoutInflater.inflate(m_res, null);
        }

        // 3
        final TextView titleTextView = (TextView)convertView.findViewById(R.id.txt_title);
        final TextView descTextView = (TextView)convertView.findViewById(R.id.txt_desc);

        titleTextView.setText("[" + item.m_created_date + "] " + item.m_car_brand + " - " + item.m_car_model + ": " + item.m_booking_for);
        descTextView.setText(item.m_detail);
        
        return convertView;
    }
}
