package com.projectth.mobile.rabbitauto;

import android.content.Context;
import android.support.annotation.LayoutRes;
import android.support.annotation.NonNull;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.engine.DiskCacheStrategy;

/**
 * Created by Administrator on 3/25/2017.
 */

public class CarItemAdapter extends ArrayAdapter<CarItem> {
    Context ctx;
    CarItem[] carItem;
    int m_res;

    public CarItemAdapter(@NonNull Context context, @LayoutRes int resource, @NonNull CarItem[] objects) {
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
    public CarItem getItem(int position) {
        return carItem[position];
    }

    @Override
    public long getItemId(int position) {
        return 0;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {

        // 1
        final CarItem item = carItem[position];

        // 2
        if (convertView == null) {
            final LayoutInflater layoutInflater = LayoutInflater.from(ctx);
            convertView = layoutInflater.inflate(m_res, null);
        }

        // 3
        final ImageView imgCar = (ImageView)convertView.findViewById(R.id.imgCar);
        final TextView titleTextView = (TextView)convertView.findViewById(R.id.txt_title);
        final TextView priceTextView = (TextView)convertView.findViewById(R.id.txt_price);

        // 4
        // imageView.setImageResource(item.m_pic1);

        Glide.with(ctx)
                .load(item.m_pic1)
                .diskCacheStrategy(DiskCacheStrategy.ALL)
                .into(imgCar);

        titleTextView.setText(item.m_title);
        priceTextView.setText("Price: " + item.m_price);

        return convertView;
    }
}
