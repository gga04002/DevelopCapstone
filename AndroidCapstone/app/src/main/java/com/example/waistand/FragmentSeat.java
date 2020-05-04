package com.example.waistand;

import android.app.Activity;
import android.bluetooth.BluetoothAdapter;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

import java.util.ArrayList;
import java.util.Objects;

import app.akexorcist.bluetotohspp.library.BluetoothSPP;
import app.akexorcist.bluetotohspp.library.BluetoothState;
import app.akexorcist.bluetotohspp.library.DeviceList;

public class FragmentSeat extends Fragment {
    private BluetoothSPP btSpp;
    private Button btnConnect;
    private Button btnSend;

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        final ViewGroup rootView = (ViewGroup) inflater.inflate(R.layout.fragment_seat, container, false);

        btnConnect = rootView.findViewById(R.id.btnConnect);
        btnSend = rootView.findViewById(R.id.btnSend);

        btSpp = new BluetoothSPP(getContext());
        Log.i("BLUETOOTHENABLE", ""+btSpp);

        if(!btSpp.isBluetoothAvailable()){ // 블루투스 사용 불가
            Toast.makeText(getActivity().getApplicationContext(), "블루투스를 사용할 수 없습니다.", Toast.LENGTH_SHORT).show();
            getActivity().finish();
        }

        // 데이터 수신 이벤트 리스너
        btSpp.setOnDataReceivedListener(new BluetoothSPP.OnDataReceivedListener() {
            @Override
            public void onDataReceived(byte[] data, String message) { // 아두이노 -> 안드로이드 데이터를 수신
                Toast.makeText(getContext(), message, Toast.LENGTH_SHORT).show();

                String[] array;
                ArrayList<Integer> idList = new ArrayList<>();

                //텍스트 레이아웃 배치 값 받아오기
                for (int i=0 ; i<28 ; i++) {
                    idList.add(getResources().getIdentifier("tv" + i, "id", Objects.requireNonNull(getActivity()).getPackageName()));
                }

                array = message.split(",");
//                Log.i("array length ", array.length+"");
                // array.length : 29 / array[0] = "data"

                //int 배열로 변환
//                    int arrayInt[] = new int[array.length];

                ArrayList<Integer> arrayInt = new ArrayList<>();
                int sensorVal;

                for (int i=1; i<array.length; i++){
                    arrayInt.add(Integer.parseInt(array[i]));

                    //값에따라 색상 바뀌기 => 왜 구린 색이 되지..?
                    sensorVal = arrayInt.get(i-1);
                    /*
                    if (sensorVal<50){
                        ((TextView) findViewById(idList.get(i-1))).setBackgroundColor(Color.WHITE);
                    }
                    else if (sensorVal>=50 && sensorVal<100){
                        ((TextView) findViewById(idList.get(i-1))).setBackgroundColor(R.color.AURORA_GREEN);
                    }else if (sensorVal>=100 && sensorVal<150){
                        ((TextView) findViewById(idList.get(i-1))).setBackgroundColor(R.color.COOL_GREEN);
                    }else if (sensorVal>=150 && sensorVal<200){
                        ((TextView) findViewById(idList.get(i-1))).setBackgroundColor(R.color.KELLEY_GREEN);
                    }else if (sensorVal>=200){
                        ((TextView) findViewById(idList.get(i-1))).setBackgroundColor(R.color.LA_SALLE_GREEN);
                    }
                     */

                    // 센서배치대로 그려놓은 각 TextView 값을 실제 센서값대로 바꾸기
                    // 이 때 array[i] 타입은 String
                    ((TextView)rootView.findViewById(idList.get(i-1))).setText(array[i]);
                }
            }
        });

        // 연결 이벤트 리스너
        btSpp.setBluetoothConnectionListener(new BluetoothSPP.BluetoothConnectionListener() {
            @Override
            public void onDeviceConnected(String name, String address) { // 연결 됐을 때
                Toast.makeText(getActivity().getApplicationContext(), name + "에 연결됨 \n" + address, Toast.LENGTH_SHORT).show();
            }

            @Override
            public void onDeviceDisconnected() {
                Toast.makeText(getActivity().getApplicationContext(), "연결 해제됨", Toast.LENGTH_SHORT).show();
            }

            @Override
            public void onDeviceConnectionFailed() { //연결 실패
                Toast.makeText(getActivity().getApplicationContext(), "연결 실패!", Toast.LENGTH_SHORT).show();
            }
        });

        btnConnect.setOnClickListener(new View.OnClickListener(){ // 연결 버튼 누름-> 블루투스 연결시도
            @Override
            public void onClick(View v) {
                if(btSpp.getServiceState() == BluetoothState.STATE_CONNECTED)
                    btSpp.disconnect();
                else{
                    Intent intent = new Intent(getActivity().getApplicationContext(), DeviceList.class);
                    startActivityForResult(intent, BluetoothState.REQUEST_CONNECT_DEVICE);
                }
            }
        });



        return rootView;
    }

    @Override
    public void onDestroy() {
        super.onDestroy();
        btSpp.stopService();
    }

    @Override
    public void onStart() {
        super.onStart();
        if(! btSpp.isBluetoothEnabled()){
            Intent intent = new Intent(BluetoothAdapter.ACTION_REQUEST_ENABLE);
            startActivityForResult(intent, BluetoothState.REQUEST_ENABLE_BT);
        }else {
            if(! btSpp.isServiceAvailable()){
                btSpp.setupService();
                btSpp.startService(BluetoothState.DEVICE_OTHER);
                // DEVICE_OTHER : 아두이노 기기 - 안드로이드 연결
                setup();
            }
        }
    }

    public void setup(){ // 블루투스 서비스가 시작되고 난 뒤 실행되는 메서드
        btnSend.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View v) { // btnSend(출력) 버튼을 누르면 Text가 아두이노에 전송됨
                btSpp.send("Text", true);
            }
        });
    }

    @Override
    public void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if(requestCode == BluetoothState.REQUEST_CONNECT_DEVICE){ // 연결할 디바이스리스트 반환 요청 시
            // BluetoothState.REQUEST_CONNECT_DEVICE : DeviceListActivity가 연결할 디바이스 리스트를 반환
            if(resultCode == Activity.RESULT_OK)
                btSpp.connect(data);
        } else if(requestCode == BluetoothState.REQUEST_ENABLE_BT){ //
            if(requestCode == Activity.RESULT_OK){
                btSpp.setupService();
                btSpp.startService(BluetoothState.DEVICE_OTHER);
                setup();
            }
            else{
                Toast.makeText(getActivity().getApplicationContext(), "블루투스가 활성화 되지 않았음", Toast.LENGTH_SHORT).show();
                getActivity().finish();
            }
        }
    }


}
