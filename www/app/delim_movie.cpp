#include<bits/stdc++.h>
using namespace std;
int main(){
	freopen("in3.txt","r",stdin);
	freopen("out3.txt","w",stdout);
	string s;
	while(!cin.eof()){
		getline(cin,s);
		//cout<<s<<endl;
		string t="insert into movie values(";
		stringstream ss(s);
		vector<string> v;
		while(!ss.eof()){
			string x;
			getline(ss,x,'|');
			v.push_back(x);
		}
		int l=v.size(),i;
		string a;
		a=v[1].substr(v[1].size()-5,4);
		v[1]=v[1].substr(0,v[1].size()-7);
		t+=v[0];
		t+=",";
		for(i=1;i<l;i++){
			if(i!=l-1&&i!=3&&i<5){
			t+="\"";
			t+=v[i];
			t+="\",";
			}
			else if(i>=5){
				t+=v[i];
				t+=",";
			}
		}
		t+=a;
		t+=");";
		cout<<t<<"\n";
	}
	return 0;
}
