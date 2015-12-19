#include<bits/stdc++.h>
using namespace std;
int main(){
	freopen("in.txt","r",stdin);
	freopen("out.txt","w",stdout);
	string s;
	while(!cin.eof()){
		getline(cin,s);
		//cout<<s<<endl;
		string t="insert into user(password,age,gender,profession) values('7294001ae51b8cdfd50eb4459ee28182',";
		stringstream ss(s);
		vector<string> v;
		while(!ss.eof()){
			string x;
			getline(ss,x,'|');
			v.push_back(x);
		}
		t+=v[1];
		t+=",'";
		t+=v[2];
		t+="','";
		t+=v[3];
		t+="');";
		//cout<<v[i]<<"*";
		cout<<t;
		cout<<endl;
	}
	return 0;
}
