package com.example.waistand;

import android.app.Activity;
import android.bluetooth.BluetoothAdapter;
import android.content.Intent;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;

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
        ViewGroup rootView = (ViewGroup) inflater.inflate(R.layout.fragment_seat, container, false);
/*
        btSpp = new BluetoothSPP(getActivity());
        btnConnect = rootView.findViewById(R.id.btnConnect);
        btnSend = rootView.findViewById(R.id.btnSend);

        if(btSpp.isBluetoothAvailable()){ // 블루투스 사용 불가
            Toast.makeText(getActivity().getApplicationContext(), "블루투스를 사용할 수 없습니다.", Toast.LENGTH_SHORT).show();
            getActivity().finish();
        }

        // 데이터 수신 이벤트 리스너
        btSpp.setOnDataReceivedListener(new BluetoothSPP.OnDataReceivedListener() {
            @Override
            public void onDataReceived(byte[] data, String message) { // 아두이노에서 넘어오는 데이터를 수신
                Toast.makeText(getContext(), message, Toast.LENGTH_SHORT).show();
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
*/
        return rootView;
    }

/*    @Override
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

 */
}
