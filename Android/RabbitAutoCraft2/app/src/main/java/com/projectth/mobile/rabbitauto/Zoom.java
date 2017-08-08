package com.projectth.mobile.rabbitauto;

/**
 * Created by User on 31/3/2560.
 */

import android.content.Context;
        import android.graphics.Canvas;
        import android.graphics.drawable.Drawable;
import android.os.Build;
import android.view.KeyEvent;
import android.view.MotionEvent;
import android.view.View;
import android.widget.ImageButton;

public class Zoom extends View {

    private Drawable image;
    ImageButton img,img1;
    private int zoomControler=300;

    public Zoom(Context context){
        super(context);

        //image=context.getResources().getDrawable(R.drawable.j);

        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.LOLLIPOP) {
            image = context.getResources().getDrawableForDensity(R.mipmap.placeholder,1,null);
        }else{
            image=context.getResources().getDrawable(R.mipmap.placeholder);
        }
        setFocusable(true);
    }

    @Override
    protected void onDraw(Canvas canvas) {
        super.onDraw(canvas);

        //here u can control the width and height of the images........ this line is very important
        image.setBounds((getWidth()/2)-zoomControler, (getHeight()/2)-zoomControler, (getWidth()/2)+zoomControler, (getHeight()/2)+zoomControler);
        image.draw(canvas);
    }

    @Override
    public boolean onTouchEvent(MotionEvent event) {
        return super.onTouchEvent(event);
    }

    @Override
    public boolean onKeyDown(int keyCode, KeyEvent event) {

        if(keyCode==KeyEvent.KEYCODE_DPAD_UP){
            // zoom in
            zoomControler+=10;
        }
        if(keyCode==KeyEvent.KEYCODE_DPAD_DOWN){
            // zoom out
            zoomControler-=10;
        }
        if(zoomControler<10){
            zoomControler=10;
        }

        invalidate();
        return true;
    }
}