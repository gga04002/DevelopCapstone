import pandas as pd
from sklearn.neighbors import KNeighborsClassifier
from sklearn.linear_model import LogisticRegression
from sklearn.ensemble import RandomForestClassifier
from sklearn.svm import LinearSVC
from sklearn.model_selection import train_test_split
from matplotlib import pyplot as plt

#------학습모델 생성 --------
lr_model = LogisticRegression(solver='lbfgs', max_iter=5000) # Linear Regression 기반 학습모델
# max_iter : 해를 찾아가는 데 있어서 반복횟수를 제한하는 것 (무한루프 방지?)
# max_iter 설정 안해주면 => ConvergenceWarning: lbfgs failed to converge (status=1)

knn_model = KNeighborsClassifier(n_neighbors=5, n_jobs=-1) # KNN 기반 학습모델
svc_model = LinearSVC(C=1.0) # SVC (SVM) 학습모델
rfc_model = RandomForestClassifier(n_estimators=100) # 랜덤포레스트 분류기 학습모델

#------데이터 불러오기-------
# data = np.loadtxt("dataset.csv", skiprows=1, delimiter=",")
data = pd.read_csv("dataset2.csv")

# 학습데이터, 테스트데이터 나누기
train, test = train_test_split(data, test_size=0.2)
# print(train.shape)

train_feat = train.iloc[:, 1:29]
train_targ = train["Label"]
# print(train_feat.head(5))

test_feat = test.iloc[:, 1:29]
test_targ = test["Label"] 

#----------기계학습------------
# knn_model.fit(train_feat, train_targ)
lr_model.fit(train_feat, train_targ)
# lr.fit() : Linear Regression 알고리즘을 사용해 머신러닝을 수행한다. 
# Linear Regression 객체를 만들고 fit() 메서드를 사용해 데이터를 학습시킨다.
# fit(학습할 data배열, 타겟 label 배열)

# print('학습평가 (KNN) : ', knn_model.score(train_feat, train_targ))
print('학습평가 (LR) : ', lr_model.score(train_feat, train_targ))

# print('테스트 평가 (KNN) : ', knn_model.score(test_feat, test_targ))
print('테스트 평가 (LR) : ', lr_model.score(test_feat, test_targ))

# print(test_feat.head(1))

# print('실제 예측 (KNN) : ', knn_model.predict( test_feat.tail(4) ))
print('실제 예측 (LR) : ', lr_model.predict(test_feat.tail(4)))
print('실제 값 : \n', test.iloc[-4:, 0:29])

plt.figure(figsize=(10, 7))

plt.plot(lr_model.coef_.T, 'v', label="C=1.0")
plt.xticks(range(train.shape[1]), train.Label, rotation=90)

xlims = plt.xlim()
plt.hlines(0, xlims[0], xlims[1])
plt.xlim(xlims)
plt.ylim(-5, 5)
plt.xlabel("ATTR")
plt.ylabel("COEF SIZE")
plt.legend()

