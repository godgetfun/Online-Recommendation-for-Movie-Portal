#include<bits/stdc++.h>
using namespace std;
int main(){
	freopen("movielist_small_rotten.txt","r",stdin);
	freopen("movielist_final_rotten.txt","w",stdout);
	string s;
	while(getline(cin,s)){
		stringstream ss(s);
		string t;
		t+="http://www.rottentomatoes.com/m/";
		while(!ss.eof()){
			string x;
			ss>>x;
			t+=x;
			t+="-";
		}
		t=t.substr(0,t.size()-1);
		cout<<t<<"\n";
	}
}
