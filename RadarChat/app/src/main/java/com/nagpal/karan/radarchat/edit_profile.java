package com.nagpal.karan.radarchat;

import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.database.Cursor;
import android.graphics.BitmapFactory;
import android.graphics.Typeface;
import android.net.Uri;
import android.provider.MediaStore;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.text.InputType;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;

import de.hdodenhof.circleimageview.CircleImageView;

public class edit_profile extends AppCompatActivity {

    String new_username;
    Typeface tf;
    private static int RESULT_LOAD_IMAGE = 1;
    RelativeLayout editProfileLayout;
   // Menu menu;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_edit_profile);

        Toolbar toolbar = (Toolbar) findViewById(R.id.tool_bar);
        setSupportActionBar(toolbar);
        if (getSupportActionBar() != null){
            getSupportActionBar().setDisplayHomeAsUpEnabled(true);
            getSupportActionBar().setDisplayShowHomeEnabled(true);
        }

        toolbar.setNavigationOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                //What to do on back clicked
                Intent i = new Intent(edit_profile.this,Chats.class);
                startActivity(i);
            }
        });

        CircleImageView img = (CircleImageView) findViewById(R.id.display_pic);
        SharedPreferences app_preferences = getSharedPreferences("mainuser", MODE_PRIVATE);
        String image = app_preferences.getString("imageURI", String.valueOf(false));
        if( !image.equals(String.valueOf(false)) )
            img.setImageBitmap(BitmapFactory.decodeFile(image));


        String backgroundColor = app_preferences.getString("backgroundColor",null);
        String fontColor = app_preferences.getString("fontColor",null);

        editProfileLayout = (RelativeLayout) findViewById(R.id.editProfileLayout);
        if(backgroundColor.equals("White")){
            editProfileLayout.setBackgroundColor(getResources().getColor(R.color.white));
        }
        else if(backgroundColor.equals("Black")){
            editProfileLayout.setBackgroundColor(getResources().getColor(R.color.black));
        }
        else if(backgroundColor.equals("Blue")){
            editProfileLayout.setBackgroundColor(getResources().getColor(R.color.lightblue));
        }
        else if(backgroundColor.equals("Orange")){
            editProfileLayout.setBackgroundColor(getResources().getColor(R.color.orange));
        }


        tf = Typeface.createFromAsset(getAssets(),
                "fonts/Psilly.otf");
        TextView tv = (TextView)findViewById(R.id.userName);
        tv.setTypeface(tf);
        String name = app_preferences.getString("username", "");
        tv.setText("Username : " + name);

        Button change_Pic = (Button)findViewById(R.id.edit_pic);
        change_Pic.setTypeface(tf);
        change_Pic.setText("Change Profile Picture");

        Button change_username = (Button)findViewById(R.id.edit_user);
        change_username.setTypeface(tf);
        change_username.setText("Change Username");

        if(fontColor.equals("White")){
            tv.setTextColor(getResources().getColor(R.color.white));
            change_Pic.setTextColor(getResources().getColor(R.color.white));
            change_username.setTextColor(getResources().getColor(R.color.white));
        }
        else if(fontColor.equals("Black")){
            tv.setTextColor(getResources().getColor(R.color.black));
            change_Pic.setTextColor(getResources().getColor(R.color.black));
            change_username.setTextColor(getResources().getColor(R.color.black));
        }
        else if(fontColor.equals("Blue")){
            tv.setTextColor(getResources().getColor(R.color.lightblue));
            change_Pic.setTextColor(getResources().getColor(R.color.lightblue));
            change_username.setTextColor(getResources().getColor(R.color.lightblue));
        }
        else if(fontColor.equals("Orange")){
            tv.setTextColor(getResources().getColor(R.color.orange));
            change_Pic.setTextColor(getResources().getColor(R.color.orange));
            change_username.setTextColor(getResources().getColor(R.color.orange));
        }

    }

    public void changePic(View view){
        Intent intent = new Intent(Intent.ACTION_PICK,  MediaStore.Images.Media.EXTERNAL_CONTENT_URI);
        startActivityForResult(Intent.createChooser(intent,"Select Picture"), RESULT_LOAD_IMAGE);
    }

    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data) {
        if (requestCode == RESULT_LOAD_IMAGE && resultCode == RESULT_OK && null != data) {
            Uri selectedImage = data.getData();
            String[] filePathColumn = { MediaStore.Images.Media.DATA };
            Cursor cursor = getContentResolver().query(selectedImage,filePathColumn, null, null, null);
            cursor.moveToFirst();
            int columnIndex = cursor.getColumnIndex(filePathColumn[0]);
            String picturePath = cursor.getString(columnIndex);
            cursor.close();
            ImageView imageView = (ImageView) findViewById(R.id.display_pic);
            imageView.setImageBitmap(BitmapFactory.decodeFile(picturePath));

            SharedPreferences app_preferences = getSharedPreferences("mainuser", MODE_PRIVATE);
            SharedPreferences.Editor editor = app_preferences.edit();
            editor.putString("imageURI", picturePath);
            editor.commit();
        }
    }

    public void changeUser(View view){
        AlertDialog.Builder edit_user = new AlertDialog.Builder(this);
        edit_user.setTitle("Enter New Username");
        final EditText new_input = new EditText(this);
        new_input.setInputType(InputType.TYPE_CLASS_TEXT);
        edit_user.setView(new_input);

        edit_user.setPositiveButton("Ok", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialogInterface, int i) {
                SharedPreferences app_preferences = getSharedPreferences("mainuser", MODE_PRIVATE);
                SharedPreferences.Editor editor = app_preferences.edit();

                new_username = new_input.getText().toString();
                new_username.toLowerCase();
                String a = new_username;
                a.toUpperCase();
                new_username.replaceFirst(new_username.charAt(0)+"",a.charAt(0)+"");
                editor.putString("username", new_username);
                editor.commit();

                TextView tv = (TextView)findViewById(R.id.userName);
                tv.setTypeface(tf);
                String name = app_preferences.getString("username", "");
                tv.setText("Username : " + name);

            }
        });

        edit_user.setNegativeButton("Cancel", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialogInterface, int i) {
                dialogInterface.cancel();
            }
        });

        edit_user.show();
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        MenuInflater inflater = getMenuInflater();
        inflater.inflate(R.menu.overflow_menu, menu); //inflate our menu
        return true;
    }

    @Override
    public boolean onPrepareOptionsMenu(Menu menu) {
        menu.findItem(R.id.Exit).setVisible(false);
        super.onPrepareOptionsMenu(menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item){
        switch(item.getItemId()) {
            /*case R.id.Exit:
                moveTaskToBack(true);
                finish();
                break;*/
            case R.id.profile:
                Intent in = new Intent(this,edit_profile.class);
                startActivity(in);
                break;
            case R.id.settings:
                Intent in2 = new Intent(this,settings.class);
                startActivity(in2);
                break;
            case R.id.about:
                Intent in3 = new Intent(this,about.class);
                startActivity(in3);
                break;
        }
        return true;
    }
}
