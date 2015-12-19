#include<bits/stdc++.h>
using namespace std;
int main(){
	freopen("movielist_small.txt","r",stdin);
	freopen("movielist_final.txt","w",stdout);
	string s;
	while(getline(cin,s)){
		stringstream ss(s);
		string t;
		t+="http://www.imdb.com/find?q=";
		while(!ss.eof()){
			string x;
			ss>>x;
			t+=x;
			t+="+";
		}
	
		cout<<t<<"\n";
	}
}
