#include<bits/stdc++.h>
using namespace std;
int main(){
	freopen("in2.txt","r",stdin);
	freopen("out2.txt","w",stdout);
	string s;
	while(!cin.eof()){
		getline(cin,s);
		//cout<<s<<endl;
		string t="insert into rating values(";
		stringstream ss(s);
		vector<string> v;
		while(!ss.eof()){
			string x;
			ss>>x;
			v.push_back(x);
		}
		t+=v[0];
		t+=",";
		t+=v[1];
		t+=",";
		t+=v[2];
		t+=");";
		//cout<<v[i]<<"*";
		cout<<t;
		cout<<endl;
	}
	return 0;
}
